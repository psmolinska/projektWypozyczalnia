package com.example.wypozyczalnia;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.text.TextWatcher;
import android.text.Editable;
import java.text.SimpleDateFormat;
import java.util.Calendar;

public class RentCarActivity extends Activity {

	private ProgressDialog pDialog;
	JSONParser jsonParser = new JSONParser();
	EditText inputPlate;
	EditText inputClient;
	EditText inputStart;
	EditText inputEnd;
	EditText inputPrice;
	EditText inputDays;
	private static String url_rent_car = "http://10.0.2.2/wypozyczalnia/rent.php";
	private static final String TAG_SUCCESS = "success";

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.rent_car);
		inputStart = (EditText) findViewById(R.id.inputStart);
		inputEnd = (EditText) findViewById(R.id.inputEnd);
		inputDays = (EditText) findViewById(R.id.inputDays);
		inputClient = (EditText) findViewById(R.id.inputClient);
		inputPrice = (EditText) findViewById(R.id.inputPrice);
		inputPlate = (EditText) findViewById(R.id.inputPlate);
		inputClient.setText(Login.login);
		Calendar c = Calendar.getInstance();
		final SimpleDateFormat df = new SimpleDateFormat("yyyy-MM-dd");
		String fdate1 = df.format(c.getTime());
		inputStart.setText(fdate1);
		inputPlate.setText(ShowCarActivity.Plate);
		inputDays.addTextChangedListener(new TextWatcher() {
            
             public void afterTextChanged(Editable s)
             {
            	 if(inputDays.getText().toString().trim().length() > 0)
            	 {
                 Calendar d = Calendar.getInstance();
            	 d.getTime();
            	 int days=Integer.parseInt(inputDays.getText().toString());
            	 d.add(Calendar.DAY_OF_MONTH,days);
            	 String fdate2=df.format(d.getTime());
            	 inputEnd.setText(fdate2);
            	 int cprice = Integer.parseInt(ShowCarActivity.Price)*days;
            	 inputPrice.setText(Integer.toString(cprice));
            	 }
             }
             public void beforeTextChanged(CharSequence s, int start, int count,int after) 
             {}
             public void onTextChanged(CharSequence s, int start, int before, int count) 
             {} 
        });
		Button btnRentCar = (Button) findViewById(R.id.btnRentCar);
		btnRentCar.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View view) {
				new RentCar().execute();
			}
		});
		
	}

	 
	class RentCar extends AsyncTask<String, String,String> {

		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(RentCarActivity.this);
			pDialog.setMessage("Wypozyczanie ..");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		
		protected String doInBackground(String... args) {
			String start = inputStart.getText().toString();
			String end = inputEnd.getText().toString();
			String client = inputClient.getText().toString();
			String price = inputPrice.getText().toString();
			String plate = inputPlate.getText().toString();
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("start", start));
			params.add(new BasicNameValuePair("end", end));
			params.add(new BasicNameValuePair("client", client));
			params.add(new BasicNameValuePair("price", price));
			params.add(new BasicNameValuePair("plate", plate));			
			JSONObject json = jsonParser.makeHttpRequest(url_rent_car,
					"POST", params);
			Log.d("Wypozyczanie ", json.toString());
			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
					Intent i = new Intent(getApplicationContext(), ShowRentActivity.class);
					startActivity(i);
					finish();
				} else {
				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return null;
		}
		protected void onPostExecute(String file_url) {
			pDialog.dismiss();
		}

	}
}
