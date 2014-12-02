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

public class Register extends Activity {

	private ProgressDialog pDialog;
	JSONParser jsonParser = new JSONParser();
	EditText inputName;
	EditText inputLastName;
	EditText inputCity;
	EditText inputStreet;
	EditText inputPostCode;
	EditText inputEMail;
	EditText inputPhone;
	EditText inputDLN;
	EditText inputPassword;
	private static String url_register_client = "http://10.0.2.2/wypozyczalnia/register.php";
	private static final String TAG_SUCCESS = "success";

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.register_client);
		inputEMail = (EditText) findViewById(R.id.inputEMail);
		inputPassword = (EditText) findViewById(R.id.inputPassword);
		inputCity = (EditText) findViewById(R.id.inputCity);
		inputStreet = (EditText) findViewById(R.id.inputStreet);
		inputPostCode = (EditText) findViewById(R.id.inputPostCode);
		inputPhone = (EditText) findViewById(R.id.inputPhone);
		inputName = (EditText) findViewById(R.id.inputName);
		inputLastName = (EditText) findViewById(R.id.inputLastName);
		inputDLN = (EditText) findViewById(R.id.inputDLN);
		Button btnRegistersys = (Button) findViewById(R.id.btnRegistersys);
		btnRegistersys.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View view) {
				new RegisterUser().execute();
			}
		});
	}

	class RegisterUser extends AsyncTask<String, String,String> {

		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(Register.this);
			pDialog.setMessage("Rejestracja ..");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		protected String doInBackground(String... args) {
			String email = inputEMail.getText().toString();
			String password = inputPassword.getText().toString();
			String name = inputName.getText().toString();
			String lastname = inputLastName.getText().toString();
			String city = inputCity.getText().toString();
			String postcode = inputPostCode.getText().toString();
			String street = inputStreet.getText().toString();
			String phone = inputPhone.getText().toString();
			String dln = inputDLN.getText().toString();
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("email", email));
			params.add(new BasicNameValuePair("password", password));
			params.add(new BasicNameValuePair("name", name));
			params.add(new BasicNameValuePair("lastname", lastname));
			params.add(new BasicNameValuePair("city", city));
			params.add(new BasicNameValuePair("postcode", postcode));
			params.add(new BasicNameValuePair("street", street));
			params.add(new BasicNameValuePair("phone", phone));
			params.add(new BasicNameValuePair("dln", dln));
			JSONObject json = jsonParser.makeHttpRequest(url_register_client,
					"POST", params);
			Log.d("Rejestrowanie ", json.toString());
			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
					Intent i = new Intent(getApplicationContext(), Login.class);
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
