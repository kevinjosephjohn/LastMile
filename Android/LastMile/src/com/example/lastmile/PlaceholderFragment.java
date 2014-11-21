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
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.annotation.SuppressLint;
import android.app.Fragment;
import android.app.FragmentTransaction;
import android.content.Context;
import android.content.Intent;
import android.graphics.Typeface;
import android.location.Location;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.FragmentActivity;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.WebView.FindListener;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.dd.CircularProgressButton;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.GooglePlayServicesClient;
import com.google.android.gms.location.LocationClient;
import com.google.android.gms.location.LocationListener;
import com.google.android.gms.location.LocationRequest;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.GoogleMap.OnCameraChangeListener;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.CameraPosition;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

public class PlaceholderFragment extends Fragment implements
		GooglePlayServicesClient.ConnectionCallbacks,
		GooglePlayServicesClient.OnConnectionFailedListener, LocationListener {

	CircularProgressButton pickup_button;
	Button changefragment;
	TextView pickup_text, StreetName, ETA, ETA_TEXT;
	ImageView pin_green, pin_red;
	Typeface regular, bold, light;
	private GoogleMap mMap;
	RelativeLayout test;
	LocationClient mLocationClient;
	Location mCurrentLocation;
	LocationRequest mLocationRequest;
	// Milliseconds per second
	private static final int MILLISECONDS_PER_SECOND = 1000;
	// Update frequency in seconds
	public static final int UPDATE_INTERVAL_IN_SECONDS = 5;
	// Update frequency in milliseconds
	private static final long UPDATE_INTERVAL = MILLISECONDS_PER_SECOND
			* UPDATE_INTERVAL_IN_SECONDS;
	// The fastest update frequency, in seconds
	private static final int FASTEST_INTERVAL_IN_SECONDS = 1;
	// A fast frequency ceiling in milliseconds
	private static final long FASTEST_INTERVAL = MILLISECONDS_PER_SECOND
			* FASTEST_INTERVAL_IN_SECONDS;

	public PlaceholderFragment() {
	}

	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
			Bundle savedInstanceState) {
		Context context = getActivity();
		mLocationClient = new LocationClient(context, this, this);
		final View rootView = inflater.inflate(R.layout.fragment_main,
				container, false);
		pin_red = (ImageView) rootView.findViewById(R.id.pin_red);
		pin_green = (ImageView) rootView.findViewById(R.id.pin);
		pin_red.setVisibility(View.GONE);
		pin_green.setVisibility(View.GONE);
		mMap = ((MapFragment) getFragmentManager().findFragmentById(R.id.map))
				.getMap();
		mMap.getUiSettings().setZoomControlsEnabled(false);
		OnCameraChangeListener listener = new OnCameraChangeListener() {

			@Override
			public void onCameraChange(CameraPosition position) {
				// TODO Auto-generated method stub

				LatLng center = position.target;

				String pinLocation = Double.toString(center.latitude) + ","
						+ Double.toString(center.longitude);
				String lat = Double.toString(center.latitude);
				String lng = Double.toString(center.longitude);
				new pickup().execute(lat, lng);
				// Toast.makeText(getApplicationContext(), pinLocation,
				// Toast.LENGTH_SHORT).show();
				Log.i("Passing To Api", pinLocation);

			}
		};
		mMap.setOnCameraChangeListener(listener);
		mLocationRequest = LocationRequest.create();
		mLocationRequest.setPriority(LocationRequest.PRIORITY_HIGH_ACCURACY);
		mLocationRequest.setInterval(UPDATE_INTERVAL);
		mLocationRequest.setFastestInterval(FASTEST_INTERVAL);
		bold = Typeface.createFromAsset(getActivity().getAssets(),
				"fonts/bold.otf");
		regular = Typeface.createFromAsset(getActivity().getAssets(),
				"fonts/regular.otf");
		light = Typeface.createFromAsset(getActivity().getAssets(),
				"fonts/light.otf");
		pickup_text = (TextView) rootView.findViewById(R.id.pickuplocation);
		pickup_text.setText("PICKUP LOCATION");
		pickup_text.setTypeface(light);

		return rootView;

	}

	private class pickup extends AsyncTask<String, Integer, String> {

		@Override
		protected void onPreExecute() {
			pickup_button = (CircularProgressButton) getView().findViewById(
					R.id.pickup_button);
			TextView StreetName = (TextView) getView().findViewById(
					R.id.StreetName);
			TextView ETA = (TextView) getView().findViewById(R.id.ETA);
			TextView ETA_TEXT = (TextView) getView()
					.findViewById(R.id.ETA_TEXT);
			StreetName.setTypeface(regular);
			ETA_TEXT.setTypeface(bold);
			ETA.setTypeface(bold);
			ETA_TEXT.setText("");
			ETA.setText("");
			pickup_button.setIndeterminateProgressMode(true);
			pickup_button.setProgress(50);

		}

		@Override
		protected String doInBackground(String... params) {
			// TODO Auto-generated method stub
			// Create a new HttpClient and Post Header

			HttpClient httpclient = new DefaultHttpClient();
			HttpPost httppost = new HttpPost(
					"http://128.199.134.210/api/api.php");
			String responseBody = null;

			try {
				// Add your data
				List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
				nameValuePairs.add(new BasicNameValuePair("lat", params[0]));
				nameValuePairs.add(new BasicNameValuePair("lng", params[1]));

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

		@SuppressLint("DefaultLocale")
		@Override
		protected void onPostExecute(String result) {
			try {
				mMap.clear();
				pin_red = (ImageView) getView().findViewById(R.id.pin_red);
				pin_green = (ImageView) getView().findViewById(R.id.pin);
				TextView StreetName = (TextView) getView().findViewById(
						R.id.StreetName);
				TextView ETA = (TextView) getView().findViewById(R.id.ETA);
				TextView ETA_TEXT = (TextView) getView().findViewById(
						R.id.ETA_TEXT);
				StreetName.setTypeface(regular);
				ETA_TEXT.setTypeface(bold);
				ETA.setTypeface(bold);

				JSONObject data = new JSONObject(result);
				JSONArray car_locations = (JSONArray) data.get("cars");
				int length = car_locations.length();
				String time = data.getString("eta");
				String street = data.getString("address");
				String[] separated = time.split(" ");
				Log.i("Stree Name", street);
				Log.i("ETA", time);

				if (length != 0) {
					for (int i = 0; i < car_locations.length(); i++) {

						JSONObject jsonProductObject = car_locations
								.getJSONObject(i);

						double latitude = Double.parseDouble(jsonProductObject
								.getString("lat"));
						double longitude = Double.parseDouble(jsonProductObject
								.getString("lng"));

						mMap.addMarker(new MarkerOptions().position(
								new LatLng(latitude, longitude)).icon(
								BitmapDescriptorFactory
										.fromResource(R.drawable.car)));
					}
				}

				if (separated[0].equalsIgnoreCase("NO")) {

					pickup_button.setProgress(-1);
					pin_green.setVisibility(View.GONE);
					pin_red.setVisibility(View.VISIBLE);

				} else {
					pickup_button.setProgress(0);
					pin_red.setVisibility(View.GONE);
					pin_green.setVisibility(View.VISIBLE);
				}
				StreetName.setText(street);
				ETA_TEXT.setText(separated[1].toUpperCase());
				ETA.setText(separated[0]);

			} catch (JSONException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}

		}
	}

	@Override
	public void onLocationChanged(Location location) {
		// TODO Auto-generated method stub

	}

	@Override
	public void onStart() {
		super.onStart();
		// Connect the client.
		mLocationClient.connect();
	}

	@Override
	public void onStop() {
		// Disconnecting the client invalidates it.
		mLocationClient.disconnect();
		super.onStop();
	}

	@Override
	public void onConnectionFailed(ConnectionResult arg0) {
		// TODO Auto-generated method stub

	}

	@Override
	public void onConnected(Bundle arg0) {
		// TODO Auto-generated method stub
		mCurrentLocation = mLocationClient.getLastLocation();
		CameraPosition cameraPosition = new CameraPosition.Builder()
				.target(new LatLng(mCurrentLocation.getLatitude(),
						mCurrentLocation.getLongitude())).zoom(14).build();
		mMap.animateCamera(CameraUpdateFactory
				.newCameraPosition(cameraPosition));
	}

	@Override
	public void onDisconnected() {
		// TODO Auto-generated method stub

	}
}