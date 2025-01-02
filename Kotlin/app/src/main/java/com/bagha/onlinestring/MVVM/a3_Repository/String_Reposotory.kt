package com.bagha.sewingneedle.MVVM.a3_Repository

import android.app.Activity
import android.widget.LinearLayout
import androidx.lifecycle.MutableLiveData
import com.bagha.sewingneedle.MVVM.ModelsApi.Financial.GetListStringResponse
import com.bagha.sewingneedle.MVVM.a1_CallWebService.String_CallWebService
import com.bagha.sewingneedle.MVVM.a2_DataSource.String_DataSource


class String_Reposotory() : String_DataSource {

    private val callWebService: String_DataSource = String_CallWebService()




    override fun GetListStringOnline(): MutableLiveData<GetListStringResponse> {
        return callWebService.GetListStringOnline()
    }



}