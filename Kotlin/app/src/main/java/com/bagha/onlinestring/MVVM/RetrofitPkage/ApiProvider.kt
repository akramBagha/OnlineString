package com.examplesewingneedle.MVVM.RetrofitPkage

import com.bagha.onlinestring.MVVM.RetrofitPkage.ActionsRetrotit
import com.bagha.sewingneedle.MVVM.RetrofitPkage.ConfigRetrofit.config

object ApiProvider {
    var actionsRetrotit: ActionsRetrotit = config!!.create(ActionsRetrotit::class.java )



    fun apiProvider(): ActionsRetrotit {
        if (actionsRetrotit == null) {
            actionsRetrotit = config!!.create(
                ActionsRetrotit::class.java
            )
        }
        return actionsRetrotit
    }


}