package com.example.lastmile;

import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.widget.EditText;

public class SplashPageActivity extends Activity {
	@Override
	protected void onCreate(Bundle savedInstanceState) {

		super.onCreate(savedInstanceState);

		setContentView(R.layout.splash_activity);
		getActionBar().hide();
		SharedPreferences pref = getApplicationContext().getSharedPreferences(
				"MyPref", 0); // 0 - for private mode
		String status = pref.getString("is_login", "false");
		if (status.equalsIgnoreCase("true")) {
			int secondsDelayed = 1;
			new Handler().postDelayed(new Runnable() {
				@Override
				public void run() {
					startActivity(new Intent(SplashPageActivity.this,
							MainActivity.class));
					finish();
				}
			}, secondsDelayed * 1000);

		} else {

			startActivity(new Intent(SplashPageActivity.this,
					InitalPageActiviy.class));
			finish();

		}

	}

}
