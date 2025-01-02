package com.bagha.sewingneedle.MVVM.a1_CallWebService

import android.app.Activity
import android.util.Log
import android.widget.LinearLayout
import androidx.lifecycle.MutableLiveData
import com.bagha.onlinestring.MVVM.B_FalideErrorCallBack
import com.bagha.onlinestring.MVVM.B_FalideErrorCallBack.ShowError_t
import com.bagha.sewingneedle.MVVM.ModelsApi.Financial.GetListStringResponse
import com.bagha.sewingneedle.MVVM.a2_DataSource.String_DataSource
import com.examplesewingneedle.MVVM.RetrofitPkage.ApiProvider

import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class String_CallWebService() : String_DataSource {
    var actionsRetrotit = ApiProvider.apiProvider()

    override fun GetListStringOnline(): MutableLiveData<GetListStringResponse> {
        val mut: MutableLiveData<GetListStringResponse> = MutableLiveData<GetListStringResponse>()
        actionsRetrotit.GetListStringOnline()
            .enqueue(object : Callback<GetListStringResponse?> {
                override fun onResponse(
                    call: Call<GetListStringResponse?>,
                    response: Response<GetListStringResponse?>
                ) {
                    Log.i("call_response", response.toString())
                    if (response.isSuccessful) {
                        mut.setValue(response.body())
                    }
                    else {
                        Log.e("call_responseError" , response.errorBody().toString())
                    }
                }

                override fun onFailure(call: Call<GetListStringResponse?>, t: Throwable) {
                    Log.i("jsonObject_Failure" , t.message.toString())
                }
            })
        return mut
    }





}