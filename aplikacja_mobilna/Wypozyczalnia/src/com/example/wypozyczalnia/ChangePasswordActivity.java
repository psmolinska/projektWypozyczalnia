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

public class ChangePasswordActivity extends Activity {

	private ProgressDialog pDialog;
	JSONParser jsonParser = new JSONParser();
	EditText inputEMail;
	EditText inputPhone;
	EditText inputDLN;
	EditText inputPassword;
	private static String url_chg_password = "http://10.0.2.2/wypozyczalnia/chgpass.php";
	private static final String TAG_SUCCESS = "success";

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.change_password);
		inputEMail = (EditText) findViewById(R.id.inputEMail);
		inputPassword = (EditText) findViewById(R.id.inputPassword);
		inputDLN = (EditText) findViewById(R.id.inputDLN);
		Button btnChangepasssys = (Button) findViewById(R.id.btnChangepasssys);
		btnChangepasssys.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View view) {
				new ChangePassword().execute();
			}
		});
	}

	class ChangePassword extends AsyncTask<String, String,String> {
		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(ChangePasswordActivity.this);
			pDialog.setMessage("Zmiana hasla ..");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		protected String doInBackground(String... args) {
			String email = inputEMail.getText().toString();
			String password = inputPassword.getText().toString();
			String dln = inputDLN.getText().toString();
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("email", email));
			params.add(new BasicNameValuePair("password", password));
			params.add(new BasicNameValuePair("dln", dln));
			JSONObject json = jsonParser.makeHttpRequest(url_chg_password,
					"POST", params);
			Log.d("Zmiana has³a ", json.toString());
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
