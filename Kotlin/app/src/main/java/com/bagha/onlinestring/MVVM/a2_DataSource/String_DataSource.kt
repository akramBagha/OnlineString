package com.bagha.sewingneedle.MVVM.a2_DataSource

import android.app.Activity
import android.widget.LinearLayout
import androidx.lifecycle.MutableLiveData
import com.bagha.sewingneedle.MVVM.ModelsApi.Financial.GetListStringResponse

interface String_DataSource {



    fun GetListStringOnline(): MutableLiveData<GetListStringResponse>

}