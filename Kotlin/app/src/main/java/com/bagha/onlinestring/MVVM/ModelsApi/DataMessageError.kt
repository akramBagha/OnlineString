package com.bagha.sewingneedle.MVVM.ModelsApi

import com.google.gson.annotations.Expose
import com.google.gson.annotations.SerializedName

class DataMessageError {
    @SerializedName("message")
    var message: String = ""
}