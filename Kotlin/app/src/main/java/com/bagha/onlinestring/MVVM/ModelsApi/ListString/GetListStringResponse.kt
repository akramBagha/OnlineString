package com.bagha.sewingneedle.MVVM.ModelsApi.Financial

import com.google.gson.annotations.SerializedName

class GetListStringResponse {
    @SerializedName("result")
    var result: Boolean = false

    @SerializedName("strings")
    var strings :ArrayList<StringObject> = ArrayList()

    @SerializedName("widget")
    var widget :ArrayList<WidgetObject> = ArrayList()

}