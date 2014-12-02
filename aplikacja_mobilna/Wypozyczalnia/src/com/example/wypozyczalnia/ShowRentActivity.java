package com.example.wypozyczalnia;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
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

public class ShowRentActivity extends Activity {

	EditText txtPlate;
	EditText txtPrice;
	EditText txtStart;
	EditText txtEnd;
	Button close;
	String pid;
	private ProgressDialog pDialog;
	JSONParser jsonParser = new JSONParser();
	private static final String url_rent_details = "http://10.0.2.2/wypozyczalnia/get_rent_details.php";
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_PRODUCT = "rent";
	private static final String TAG_START = "start";
	private static final String TAG_PLATE = "plate";
	private static final String TAG_PRICE = "price";
	private static final String TAG_END = "end";
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.show_rent);
		Button btnClose = (Button) findViewById(R.id.btnClose);
		new GetRentDetails().execute();
		btnClose.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View arg0) {
				Intent i = new Intent(getApplicationContext(), ChooseActivity.class);
				startActivity(i);
			}
		});

}

	class GetRentDetails extends AsyncTask<String, String, String> {

		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(ShowRentActivity.this);
			pDialog.setMessage("£adowanie danych wypo¿yczenia ...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		protected String doInBackground(String... params) {
			runOnUiThread(new Runnable() {
				public void run() {
					int success;
					try {
						String email = Login.login;
						List<NameValuePair> params = new ArrayList<NameValuePair>();
						params.add(new BasicNameValuePair("email", email));
						JSONObject json = jsonParser.makeHttpRequest(
								url_rent_details, "GET", params);
						Log.d("Detale wypo¿yczenia", json.toString());
						success = json.getInt(TAG_SUCCESS);
						if (success == 1) {
							JSONArray productObj = json
									.getJSONArray(TAG_PRODUCT); // JSON Array
							JSONObject product = productObj.getJSONObject(0);
							txtPlate = (EditText) findViewById(R.id.Plate);
							txtPrice = (EditText) findViewById(R.id.Price);
							txtStart = (EditText) findViewById(R.id.Start);
							txtEnd = (EditText) findViewById(R.id.End);
							txtPlate.setText(product.getString(TAG_PLATE));
							txtPrice.setText(product.getString(TAG_PRICE));
							txtStart.setText(product.getString(TAG_START));
							txtEnd.setText(product.getString(TAG_END));
							
						}else{
						}
					} catch (JSONException e) {
						e.printStackTrace();
					}
				}
			});

			return null;
		}


		protected void onPostExecute(String file_url) {
			pDialog.dismiss();
		}
	}

	
}
