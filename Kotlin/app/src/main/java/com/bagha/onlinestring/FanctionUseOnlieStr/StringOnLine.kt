package com.falnic.a4bazservicer.FCS_ViweDesign

import android.app.Activity
import android.content.Context
import android.util.Log
import com.bagha.sewingneedle.MVVM.ModelsApi.Financial.StringObject
import com.bagha.sewingneedle.MVVM.ModelsApi.Financial.WidgetObject
import org.json.JSONArray
import org.json.JSONObject

class StringOnLine {

    companion object{
        var hashMap_string : HashMap<String , String> = HashMap()
        var widgetOnline :ArrayList<WidgetObject> = ArrayList()
        var stringOnline :ArrayList<StringObject> = ArrayList()
    }

    fun getStringAndSetString (activity : Activity) : Boolean{
        try {
            hashMap_string = HashMap()
            for(i in 0 until  stringOnline.size ){
                var jsonString = stringOnline[i]
                hashMap_string[stringOnline[i].name] = stringOnline[i].value
            }

            return true

        }
        catch (e : java.lang.NullPointerException){
            e.printStackTrace()
            return false
        }
        catch (e : java.lang.NullPointerException){
            e.printStackTrace()
            return false
        }


    }


    fun getString(context: Context  , string : Int ,stringName: String) : String {
        var result = context.getString(string);
        try {
            //if(hashMap_string.size > 0 ){
            if(stringOnline.size > 0 ){
                for(i in 0 until stringOnline.size){
                    //if(hashMap_string.keys.elementAt(i).equals(stringName.trim())){
                    if(stringOnline[i].name.equals(stringName.trim())){
                        //val keyHashMap: String = hashMap_string.keys.elementAt(i)
                        //result = hashMap_string[keyHashMap].toString()
                        result = stringOnline[i].value
                        result = SetNewLine(result)
                        break
                    }
                }
            }
        }
        catch (e : java.lang.NullPointerException){
            e.printStackTrace()
        }
        catch (e : Exception){
            e.printStackTrace()
        }

        return result;
    }

    fun SetNewLine(text : String) : String{
        var result = text
        if(text.contains("/n")){
            var result_2 = ""
            Log.i("newLine" , "true")
            var split = text.split("/n")
            for(j in 0 .. split.size-1){
                result_2 = result_2 + split[j] + "\n"
            }
            result = result_2
        }
        return result
    }
}//end class