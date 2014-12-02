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
import android.widget.Toast;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.app.AlertDialog;
import android.content.DialogInterface;

public class Login extends Activity {

	private ProgressDialog pDialog;
	JSONParser jsonParser = new JSONParser();
	EditText inputEMail;
	EditText inputPassword;
	static String login;
	int error=0;
	private static String url_login_client = "http://10.0.2.2/wypozyczalnia/login.php";
	private static final String TAG_SUCCESS = "success";

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.login_client);
		inputEMail = (EditText) findViewById(R.id.inputEMail);
		inputPassword = (EditText) findViewById(R.id.inputPassword);
		Button btnLoginsys = (Button) findViewById(R.id.btnLoginsys);
		Button btnChangepass = (Button) findViewById(R.id.btnChangepass);
		btnLoginsys.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View view) {
				new LoginUser().execute();
			}
		});
		btnChangepass.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View view) {
				Intent i = new Intent(getApplicationContext(), ChangePasswordActivity.class);
				startActivity(i);
				finish();
			}
		});
	}

	class LoginUser extends AsyncTask<String, String,String> {

		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(Login.this);
			pDialog.setMessage("Logowanie ..");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		protected String doInBackground(String... args) {
			String email = inputEMail.getText().toString();
			String password = inputPassword.getText().toString();
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("email", email));
			params.add(new BasicNameValuePair("password", password));
			JSONObject json = jsonParser.makeHttpRequest(url_login_client,
					"POST", params);
			Log.d("Logowanie ", json.toString());
			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
					Intent i = new Intent(getApplicationContext(), ChooseActivity.class);
					startActivity(i);
					login=email.toString();
					finish();
				} else 
				{
				 error=1;
				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return null;
		}

		protected void onPostExecute(String file_url) {
			 if(error==1)
			 {
				 Toast.makeText(Login.this, "Bledne haslo lub mail !", Toast.LENGTH_LONG).show();
				 pDialog.dismiss();
				 error=0;
			 }
			 }

	}
}
