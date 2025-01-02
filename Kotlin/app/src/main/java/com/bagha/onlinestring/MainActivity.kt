package com.bagha.onlinestring

import android.content.Intent
import android.os.Bundle
import android.util.Log
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.LifecycleOwner
import androidx.lifecycle.Observer
import androidx.lifecycle.ViewModelProvider
import com.bagha.onlinestring.MVVM.WebService_Url
import com.bagha.sewingneedle.MVVM.ModelsApi.Financial.GetListStringResponse
import com.bagha.sewingneedle.MVVM.a4_ViewModel.String_ViewModel
import com.falnic.a4bazservicer.FCS_ViweDesign.StringOnLine
import com.google.gson.Gson

class MainActivity : AppCompatActivity() {

    var viewModel: String_ViewModel? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        viewModel = ViewModelProvider(this).get(String_ViewModel::class.java)

        // todo call API
        CallWebServicesMVVM(WebService_Url.webServices_getListStringOnline)
    }//end main





    private fun CallWebServicesMVVM(webServicesName: String) {
        if (webServicesName == WebService_Url.webServices_getListStringOnline) {
            viewModel!!.GetListStringOnline()!!
                .observe(
                    this as LifecycleOwner,
                    Observer { stringResponse -> responseServer_getListString(stringResponse) })
        }
    }


    //__________ responseServer_getListString
    private fun responseServer_getListString(response: GetListStringResponse) {
        try {
            Log.i("response_1" , Gson().toJson(response) )
            if(response.result == true){
                StringOnLine.stringOnline = response.strings
                StringOnLine.widgetOnline = response.widget
                val intent = Intent(this , ShowDynamicString::class.java)
                startActivity(intent)
                this.finish()
            }


        }
        catch (e: NullPointerException){
            e.printStackTrace()
        }
        catch (e : Exception){
            e.printStackTrace()
        }
    }



}//end class
/*

@Composable
fun Greeting(name: String, modifier: Modifier = Modifier) {
    Text(
        text = "$name!",
        modifier = modifier
    )
}

@Preview(showBackground = true)
@Composable
fun GreetingPreview() {
    OnlineStringTheme {
        Greeting("Android")
    }
}
*/
