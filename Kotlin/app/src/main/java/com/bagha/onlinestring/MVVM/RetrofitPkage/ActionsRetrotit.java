package com.bagha.onlinestring.MVVM.RetrofitPkage;



import com.bagha.onlinestring.MVVM.WebService_Url;
import com.bagha.sewingneedle.MVVM.ModelsApi.Financial.GetListStringResponse;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ActionsRetrotit {

    @GET(WebService_Url.webServices_getListStringOnline)
    Call<GetListStringResponse> GetListStringOnline();






}
