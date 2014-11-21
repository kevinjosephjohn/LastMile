package com.example.lastmile;

import java.util.ArrayList;

import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.graphics.Typeface;
import android.os.Bundle;
import android.support.v4.app.ActionBarDrawerToggle;
import android.support.v4.widget.DrawerLayout;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

public class NavigationDrawer extends Activity {

	private String[] mDrawerItems;
	private String[] mDrawerItemsDescription;
	private DrawerLayout mDrawerLayout;
	private ListView mDrawerList;
	private ActionBarDrawerToggle mDrawerToggle;
	private ArrayList<NavDrawerItem> navDrawerItems;
	private NavDrawerListAdapter adapter;
	SharedPreferences pref;
	Editor editor;

	Typeface regular, bold, light;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.navigationdrawer);
		pref = getApplicationContext().getSharedPreferences("MyPref", 0);
		editor = pref.edit();

	}

	public void set() {
		mDrawerLayout = (DrawerLayout) findViewById(R.id.drawer_layout);

		mDrawerItems = getResources().getStringArray(R.array.drawer_items);
		mDrawerItemsDescription = getResources().getStringArray(
				R.array.drawer_items_description);

		mDrawerList = (ListView) findViewById(R.id.left_drawer);
		navDrawerItems = new ArrayList<NavDrawerItem>();
		for (int i = 0; i < 4; i++)
			navDrawerItems.add(new NavDrawerItem(mDrawerItems[i],
					mDrawerItemsDescription[i]));
		adapter = new NavDrawerListAdapter(getApplicationContext(),
				navDrawerItems);
		mDrawerList.setAdapter(adapter);
		mDrawerList.setOnItemClickListener(new SlideMenuClickListener());

		mDrawerToggle = new ActionBarDrawerToggle(this, mDrawerLayout,
				R.drawable.ic_drawer, R.string.drawer_open,
				R.string.drawer_close);
		mDrawerToggle.syncState();

		// Set the drawer toggle as the DrawerListener
		mDrawerLayout.setDrawerListener(mDrawerToggle);
		getActionBar().setDisplayHomeAsUpEnabled(true);
		getActionBar().setHomeButtonEnabled(true);

	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		// getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}

	private class SlideMenuClickListener implements
			ListView.OnItemClickListener {
		@Override
		public void onItemClick(AdapterView<?> parent, View view, int position,
				long id) {
			// display view for selected nav drawer item
			displayView(position);
		}
	}

	private void displayView(int position) {
		// update the main content by replacing fragments

		switch (position) {
		case 0:
			Toast.makeText(getApplicationContext(), "Menu item 01",
					Toast.LENGTH_LONG).show();
			mDrawerLayout.closeDrawers();
			break;
		case 1:
			Toast.makeText(getApplicationContext(), "Menu item 02",
					Toast.LENGTH_LONG).show();
			mDrawerLayout.closeDrawers();
			break;
		case 2:
			Toast.makeText(getApplicationContext(), "Menu item 03",
					Toast.LENGTH_LONG).show();
			mDrawerLayout.closeDrawers();
			break;
		case 3:
			pref.edit().clear().commit();
			startActivity(new Intent(NavigationDrawer.this,
					InitalPageActiviy.class));
			finish();
			break;

		default:
			Toast.makeText(getApplicationContext(), "Nothing Selected",
					Toast.LENGTH_LONG).show();
			mDrawerLayout.closeDrawers();
			break;
		}

	}

}
