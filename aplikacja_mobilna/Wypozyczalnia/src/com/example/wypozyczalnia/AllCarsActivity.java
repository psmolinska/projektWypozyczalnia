package com.example.wypozyczalnia;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.apache.http.NameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.ListActivity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

public class AllCarsActivity extends ListActivity {


	private ProgressDialog pDialog;
	JSONParser jParser = new JSONParser();
	ArrayList<HashMap<String, String>> carsList;
	private static String url_all_cars = "http://10.0.2.2/wypozyczalnia/get_all_cars.php";

	private static final String TAG_SUCCESS = "success";
	private static final String TAG_CARS = "cars";
	private static final String TAG_PID = "pid";
	private static final String TAG_BRAND = "brand";
	private static final String TAG_MODEL = "model";

	static int error1=0;
	JSONArray cars = null;

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.all_cars);

		carsList = new ArrayList<HashMap<String, String>>();
		new LoadAllCars().execute();
		ListView lv = getListView();
		lv.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> parent, View view,
					int position, long id) {
				String pid = ((TextView) view.findViewById(R.id.pid)).getText().toString();
				Intent in = new Intent(getApplicationContext(),
						ShowCarActivity.class);
				in.putExtra(TAG_PID, pid);
				startActivityForResult(in, 100);
			}
		});

	}

	@Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
		super.onActivityResult(requestCode, resultCode, data);
		if (resultCode == 100) {
			Intent intent = getIntent();
			finish();
			startActivity(intent);
		}

	}

	class LoadAllCars extends AsyncTask<String, String, String> {

		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(AllCarsActivity.this);
			pDialog.setMessage("Wczytuje liste samochodow ...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(false);
			pDialog.show();
		}

		protected String doInBackground(String... args) {
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			JSONObject json = jParser.makeHttpRequest(url_all_cars, "GET", params);
			Log.d("All Cars: ", json.toString());

			try {
				int success = json.getInt(TAG_SUCCESS);
				if (success == 1) {
					cars = json.getJSONArray(TAG_CARS);
					for (int i = 0; i < cars.length(); i++) {
						JSONObject c = cars.getJSONObject(i);
						String id = c.getString(TAG_PID);
						String brand = c.getString(TAG_BRAND);
						String model = c.getString(TAG_MODEL);
						HashMap<String, String> map = new HashMap<String, String>();
						map.put(TAG_PID, id);
						map.put(TAG_BRAND, brand);
						map.put(TAG_MODEL, model);
						carsList.add(map);
					}
				} else {
					Intent i = new Intent(getApplicationContext(),
							ChooseActivity.class);
					i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
					startActivity(i);
					 pDialog.dismiss();
					 error1=1;
				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return null;
		}

		protected void onPostExecute(String file_url) {
			pDialog.dismiss();
			runOnUiThread(new Runnable() {
				public void run() {
					ListAdapter adapter = new SimpleAdapter(
							AllCarsActivity.this, carsList,
							R.layout.list_cars, new String[] { TAG_PID,
									TAG_BRAND, TAG_MODEL},
							new int[] { R.id.pid, R.id.brand, R.id.model });
					setListAdapter(adapter);
				}
			});

		}

	}
}