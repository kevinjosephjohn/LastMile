package com.example.lastmile;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.StrictMode;
import android.util.Log;
import android.view.View;
import android.widget.EditText;

public class LoginActivity extends Activity {
	String uname, pass;
	EditText email, password;
	SharedPreferences pref;
	Editor editor;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);

		setContentView(R.layout.login);
		getActionBar().hide();
		pref = getApplicationContext().getSharedPreferences("MyPref", 0);
		editor = pref.edit();
		password = (EditText) findViewById(R.id.password_login);
		email = (EditText) findViewById(R.id.email_login);

	}

	public void login(View v) {
		int flag_email = 0, flag_pass = 0;

		if (email.getText().length() == 0) {
			email.setError("Email Address Cannot Be Empty");
			flag_email = 1;
		}
		if (password.getText().length() < 8) {
			password.setError("Password should contain minimum 8 characters");
			flag_pass = 1;
		}

		if (flag_email == 0 && flag_pass == 0)

		{

			uname = email.getText().toString();
			pass = password.getText().toString();
			AsyncTaskRunner runner = new AsyncTaskRunner();
			runner.execute(uname, pass);
		}

	}

	private class AsyncTaskRunner extends AsyncTask<String, String, String> {

		@Override
		protected String doInBackground(String... params) {
			HttpClient httpclient = new DefaultHttpClient();
			HttpPost httppost = new HttpPost(
					"http://128.199.134.210/api/auth/index.php");
			String responseBody = null;

			try {
				// Add your data
				List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
				nameValuePairs.add(new BasicNameValuePair("tag", "login"));

				nameValuePairs.add(new BasicNameValuePair("email", params[0]));
				nameValuePairs
						.add(new BasicNameValuePair("password", params[1]));

				httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

				// Execute HTTP Post Request
				HttpResponse response = httpclient.execute(httppost);
				HttpEntity entity = response.getEntity();
				responseBody = EntityUtils.toString(entity);
				Log.i("Response", responseBody);
				// Log.i("Parameters", params[0]);

			} catch (ClientProtocolException e) {
				// TODO Auto-generated catch block
			} catch (IOException e) {
				// TODO Auto-generated catch block
			}
			return responseBody;

		}

		/*
		 * (non-Javadoc)
		 * 
		 * @see android.os.AsyncTask#onPostExecute(java.lang.Object)
		 */
		@Override
		protected void onPostExecute(String result) {

			try {
				JSONObject data = new JSONObject(result);

				String error = data.getString("error");

				if (error.equals("0")) {
					JSONObject user_details = data.getJSONObject("user");
					String fname = user_details.getString("fname");
					String lname = user_details.getString("lname");
					String email = user_details.getString("email");
					String phone = user_details.getString("phone");
					String uid = user_details.getString("uid");

					editor.putString("is_login", "true");
					editor.putString("first_name", fname);
					editor.putString("last_name", lname);
					editor.putString("email", email);
					editor.putString("phone", phone);
					editor.putString("uid", uid);

					editor.commit();
					Intent intent = new Intent(LoginActivity.this,
							MainActivity.class);
					intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK
							| Intent.FLAG_ACTIVITY_CLEAR_TASK);
					startActivity(intent);
				} else {
					String error_msg = data.getString("error_msg");
					if (error.equals("1")) {
						email.setError(error_msg);
						password.setError(error_msg);
					}

				}
			} catch (JSONException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}

		}

		/*
		 * (non-Javadoc)
		 * 
		 * @see android.os.AsyncTask#onPreExecute()
		 */
		@Override
		protected void onPreExecute() {

			password = (EditText) findViewById(R.id.password_login);
			email = (EditText) findViewById(R.id.email_login);
			// Things to be done before execution of long running operation. For
			// example showing ProgessDialog
		}

		/*
		 * (non-Javadoc)
		 * 
		 * @see android.os.AsyncTask#onProgressUpdate(Progress[])
		 */
		@Override
		protected void onProgressUpdate(String... text) {

			// Things to be done while execution of long running operation is in
			// progress. For example updating ProgessDialog
		}
	}

}
