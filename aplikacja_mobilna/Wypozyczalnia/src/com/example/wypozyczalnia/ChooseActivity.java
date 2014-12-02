package com.example.wypozyczalnia;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class ChooseActivity extends Activity{
	
	Button btnRents;
	Button btnCars;
	Button btnCloseChoose;
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.choose_activity);
		btnRents = (Button) findViewById(R.id.btnRents);
		btnCars = (Button) findViewById(R.id.btnCars);
		btnCloseChoose = (Button) findViewById(R.id.btnCloseChoose);
		if(AllCarsActivity.error1==1){
		Toast.makeText(ChooseActivity.this, "Aktualnie brak wolnych samochodow", Toast.LENGTH_LONG).show();
		AllCarsActivity.error1=0;
		}
	
		btnRents.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View view) {
				Intent i = new Intent(getApplicationContext(), ShowRentActivity.class);
				startActivity(i);
			}
		});
		btnCars.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View view) {
				Intent i = new Intent(getApplicationContext(), AllCarsActivity.class);
				startActivity(i);
			}
		});
		btnCloseChoose.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View view) {
				finish();
			}
		});
	}
}
