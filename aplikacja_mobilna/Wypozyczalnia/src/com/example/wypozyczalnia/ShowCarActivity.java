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

public class ShowCarActivity extends Activity {

	EditText txtBrand;
	EditText txtModel;
	EditText txtProduction;
	EditText txtEquipment;
	EditText txtYear;
	EditText txtPlate;
	EditText txtBody;
	EditText txtColor;
	EditText txtCreatedAt;
	EditText txtEngine;
	EditText txtPower;
	EditText txtPrice;
	static String Plate;
	static String Price;
	Button btnRent;
	String pid;
	private ProgressDialog pDialog;
	JSONParser jsonParser = new JSONParser();
	private static final String url_car_details = "http://10.0.2.2/wypozyczalnia/get_car_details.php";
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_PRODUCT = "car";
	private static final String TAG_PID = "pid";
	private static final String TAG_BRAND = "brand";
	private static final String TAG_MODEL = "model";
	private static final String TAG_EQUIPMENT = "equipment";
	private static final String TAG_YEAR = "year";
	private static final String TAG_PLATE = "plate";
	private static final String TAG_BODY = "body";
	private static final String TAG_COLOR = "color";
	private static final String TAG_ENGINE = "engine";
	private static final String TAG_POWER = "power";
	private static final String TAG_PRICE = "price";
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.show_car);
		btnRent = (Button) findViewById(R.id.btnRent);
		Intent i = getIntent();
		pid = i.getStringExtra(TAG_PID);
		new GetCarDetails().execute();
		btnRent.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View arg0) {
				Intent i = new Intent(getApplicationContext(), RentCarActivity.class);
				startActivity(i);
				finish();
			}
		});

}

	class GetCarDetails extends AsyncTask<String, String, String> {

		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(ShowCarActivity.this);
			pDialog.setMessage("Ladowanie danych samochodu, prosze czekac...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		protected String doInBackground(String... params) {

			runOnUiThread(new Runnable() {
				public void run() {
					int success;
					try {
						List<NameValuePair> params = new ArrayList<NameValuePair>();
						params.add(new BasicNameValuePair("pid", pid));
						JSONObject json = jsonParser.makeHttpRequest(
								url_car_details, "GET", params);
						Log.d("Single Product Details", json.toString());
						success = json.getInt(TAG_SUCCESS);
						if (success == 1) {
							JSONArray productObj = json
									.getJSONArray(TAG_PRODUCT); // JSON Array
							JSONObject product = productObj.getJSONObject(0);
							txtBrand = (EditText) findViewById(R.id.inputBrand);
							txtModel = (EditText) findViewById(R.id.inputModel);
							txtEquipment = (EditText) findViewById(R.id.inputEquipment);
							txtYear = (EditText) findViewById(R.id.inputYear);
							txtPlate = (EditText) findViewById(R.id.inputPlate);
							txtBody = (EditText) findViewById(R.id.inputBody);
							txtColor = (EditText) findViewById(R.id.inputColor);
							txtEngine = (EditText) findViewById(R.id.inputEngine);
							txtPower = (EditText) findViewById(R.id.inputPower);
							txtPrice = (EditText) findViewById(R.id.inputPrice);
							txtBrand.setText(product.getString(TAG_BRAND));
							txtModel.setText(product.getString(TAG_MODEL));
							txtEquipment.setText(product.getString(TAG_EQUIPMENT));
							txtYear.setText(product.getString(TAG_YEAR));
							txtPlate.setText(product.getString(TAG_PLATE));
							txtBody.setText(product.getString(TAG_BODY));
							txtColor.setText(product.getString(TAG_COLOR));
							txtEngine.setText(product.getString(TAG_ENGINE));
							txtPower.setText(product.getString(TAG_POWER));
							txtPrice.setText(product.getString(TAG_PRICE));
							Plate=product.getString(TAG_PLATE);
							Price=product.getString(TAG_PRICE);
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
