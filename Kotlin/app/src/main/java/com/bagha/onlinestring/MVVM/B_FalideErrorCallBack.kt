package com.bagha.onlinestring.MVVM

import android.app.Activity
import android.util.Log
import android.widget.LinearLayout
import okhttp3.ResponseBody
import org.json.JSONObject

object B_FalideErrorCallBack {
    @JvmStatic

    fun ErrorBody(
        activity : Activity?,
        errorBody : ResponseBody?,
        errorCode : Int,
        LinearLayoutLoding:LinearLayout,
        LinearLayoutMainView : LinearLayout
    ){

        /*try{
            if(errorCode >= 500){
                ShowError_reponsBody(
                    activity ,
                    errorCode.toString(),
                    "Bad Gateway"
                    , LinearLayoutLoding!! ,
                    LinearLayoutMainView!!)
            }
            else if(errorCode == 404){
                ShowError_reponsBody(
                    activity ,
                    errorCode.toString(),
                    "not found"
                    , LinearLayoutLoding!! ,
                    LinearLayoutMainView!!)
            }

            else if (errorBody != null) {
                val errorBodyString = errorBody.string()
                Log.i("errorBody", errorBodyString)

                val jsonObject = JSONObject(errorBodyString)

                var message = ""
                message = jsonObject.getString("message")

                if(jsonObject.getString("message_type").equals("error")){
                    var jsonObjectData = jsonObject.getJSONObject("data")
                    if(jsonObjectData.length() > 0 && jsonObjectData.has("error")){
                        var errorMessage = jsonObjectData.getString("error")
                        if(errorMessage.equals("ACCESS_TOKEN_EXPIRED")){
                            GlobalValue().CallRefreshToken(activity!!)
                        }
                        else if(errorMessage.equals("REFRESH_TOKEN_EXPIRED") || errorMessage.equals("INVALID_TOKEN")){
                            GlobalValue().exitApp_level1(activity!!)
                        }
                        else {
                            ShowError_reponsBody(
                                activity ,
                                errorCode.toString(),
                                message
                                , LinearLayoutLoding!! ,
                                LinearLayoutMainView!!)
                        }
                    }
                    else {
                        ShowError_reponsBody(
                            activity ,
                            errorCode.toString(),
                            message
                            , LinearLayoutLoding!! ,
                            LinearLayoutMainView!!)
                    }
                }




            }
        }
        catch (e : NullPointerException){
            e.printStackTrace()
        }
        catch (e : Exception){
            e.printStackTrace()
        }*/



    }





    fun ShowError_t(activity : Activity? , t: Throwable , LinearLayoutLoding : LinearLayout , LinearLayoutMainView : LinearLayout) {
        /*var message = t.message.toString() + " : " +  t.cause.toString()
        try {

            B_Loding.UnSetLoding(LinearLayoutLoding ,LinearLayoutMainView)

            B_AlertDialogManager.showAlertMessage(
                activity ,
                StringOnLine().getString(activity!! , R.string.error , "error"),
                message,
                StringOnLine().getString(activity!! , R.string.iKnow , "iKnow")
            )
            Log.e("Error1_B_FalideErrorCallBack" , message)
        } catch (e: NullPointerException) {
            e.printStackTrace()
        } catch (e: Exception) {
            e.printStackTrace()
        }*/
    }

    fun ShowError_reponsBody(activity : Activity? , errorCode:String , messageError: String , LinearLayoutLoding : LinearLayout , LinearLayoutMainView : LinearLayout) {
        /*try {
            if(activity != null){
                B_Loding.UnSetLoding(LinearLayoutLoding ,LinearLayoutMainView)
                B_AlertDialogManager.showAlertMessage(
                    activity ,
                    StringOnLine().getString(activity!! , R.string.error , "error"),
                    "ErrorCode : " + errorCode+ "\n" + messageError,
                    StringOnLine().getString(activity!! , R.string.iKnow , "iKnow")
                )
                Log.e("Error2_B_FalideErrorCallBack" ,  errorCode +" : " +messageError)
            }
            else {
                Log.e("Error" ,  "activity = null")
            }
        } catch (e: NullPointerException) {
            e.printStackTrace()
        } catch (e: Exception) {
            e.printStackTrace()
        }*/
    }

}//end class