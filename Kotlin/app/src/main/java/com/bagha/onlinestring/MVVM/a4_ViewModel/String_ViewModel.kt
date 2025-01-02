package com.bagha.sewingneedle.MVVM.a4_ViewModel

import android.app.Activity
import android.app.Application
import android.util.Log
import android.widget.LinearLayout
import androidx.lifecycle.AndroidViewModel
import androidx.lifecycle.LiveData
import com.android.volley.AuthFailureError
import com.bagha.sewingneedle.MVVM.ModelsApi.Financial.GetListStringResponse
import com.bagha.sewingneedle.MVVM.a3_Repository.String_Reposotory


class String_ViewModel(application: Application) : AndroidViewModel(application) {

    private val reposotory = String_Reposotory()


    fun GetListStringOnline(): LiveData<GetListStringResponse>? {
        return try {
            reposotory.GetListStringOnline()
        }
        catch (error: AuthFailureError) {
            Log.e("getString_viewModel", error.message!!)
            error.printStackTrace()
            null
        }
    }



}