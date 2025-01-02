package com.falnic.a4bazservicer.FCS_ViweDesign

import android.app.Activity
import android.content.pm.PackageManager
import android.graphics.Color
import android.util.Log
import android.view.*
import android.widget.*
import com.bagha.sewingneedle.MVVM.ModelsApi.Financial.WidgetObject
import org.json.JSONArray
import org.json.JSONObject


class ViewDesign_solusion {
    var hashMap_Local = HashMap<String , View>()
    var arrayListView_Online : ArrayList<WidgetObject> = ArrayList()

    val TextView_name = "TextView"
    val EditText_name = "EditText"
    val CheckBox_name = "CheckBox"
    val RadioButton_name = "RadioButton"


    constructor(
        hashMap_Local: HashMap<String , View>
    ) {
        this.hashMap_Local = hashMap_Local
    }



    fun IsHaveViwe() : Boolean {
        var result = false
        if(StringOnLine.widgetOnline.size > 0){
            arrayListView_Online = StringOnLine.widgetOnline
            Log.i("IsHaveViwe_1" , "OK")
            for(i in 0 until  arrayListView_Online.size){
                for (j in 0 until  hashMap_Local.size){
                    //Log.i("IsHaveViwe_1_2" , "OK_"+hashMap_Local.size.toString())

                    //Log.i("IsHaveViwe_1_*" , hashMap_Local.keys.elementAt(j).toString())
                    //Log.i("IsHaveViwe_1_**" , arrayListView_Online[i].nameWidget.toString())
                    if(hashMap_Local.keys.elementAt(j).trim().equals(arrayListView_Online[i].nameWidget)){
                        val keyHashMap: String = hashMap_Local.keys.elementAt(j).trim()


                        Log.i("IsHaveViwe_2" , "OK")
                        SetParameterDesign(arrayListView_Online[i] , hashMap_Local[keyHashMap]!!)

                        result = true
                    }
                }
            }


        }
        Log.i("IsHaveViwe_3" , "OK")
        return result
    }

    fun SetParameterDesign(propertyOnline : WidgetObject , view: View) {
        var text = propertyOnline.valueWidget
        try {
            text = StringOnLine().SetNewLine(text)

            if(propertyOnline.typwWidget .equals(TextView_name)){
                (view as TextView).text = text
            }
            else if(propertyOnline.typwWidget .equals(EditText_name)){
                (view as EditText).setText(text)
            }

            else if(propertyOnline.typwWidget .equals(CheckBox_name)){
                (view as CheckBox).text = (text)
            }
            else if(propertyOnline.typwWidget .equals(RadioButton_name)){
                Log.i("radio" , text)
                (view as RadioButton).text = (text)
            }
        }
        catch (e : Exception){
            e.printStackTrace()
        }

    }

}

