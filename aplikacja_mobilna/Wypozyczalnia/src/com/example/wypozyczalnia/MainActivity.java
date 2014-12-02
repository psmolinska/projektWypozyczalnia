package com.example.wypozyczalnia;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;


public class MainActivity extends Activity{
	
	Button btnLogin;
	Button btnRegister;
	Button btnClose;
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		btnLogin = (Button) findViewById(R.id.btnLogin);
		btnRegister = (Button) findViewById(R.id.btnRegister);
		btnClose = (Button) findViewById(R.id.btnClose);
		btnLogin.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View view) {
				Intent i = new Intent(getApplicationContext(), Login.class);
				startActivity(i);
			}
		});
		btnRegister.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View view) {
				Intent i = new Intent(getApplicationContext(), Register.class);
				startActivity(i);
			}
		});
		btnClose.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View view) {
				finish();
			}
		});
	}
}
