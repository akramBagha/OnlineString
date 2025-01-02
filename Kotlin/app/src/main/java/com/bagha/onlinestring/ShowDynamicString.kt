package com.bagha.onlinestring

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.CheckBox
import android.widget.EditText
import android.widget.RadioButton
import android.widget.TextView
import com.falnic.a4bazservicer.FCS_ViweDesign.StringOnLine
import com.falnic.a4bazservicer.FCS_ViweDesign.ViewDesign_solusion

class ShowDynamicString : AppCompatActivity() {
    lateinit var textView1 : TextView
    lateinit var textView2 : TextView
    lateinit var EditText1 : EditText
    lateinit var CheckBox1 : CheckBox
    lateinit var RadioButton1 : RadioButton
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_show_dynamic_string)

        textView1 = findViewById<TextView>(R.id.TextView_1)
        textView2 = findViewById<TextView>(R.id.TextView_2)
        EditText1 = findViewById<EditText>(R.id.EditText_1)
        CheckBox1 = findViewById<CheckBox>(R.id.CheckBox_1)
        RadioButton1 = findViewById<RadioButton>(R.id.RadioButton_1)


        //todo inLine programming
        textView2.text = StringOnLine().getString(this , R.string.Line2 , "Line2" )

        //if fill TextView in XML layout
        setSteringOnline()


    }

    private fun setSteringOnline() {
        val hashMap_Local: HashMap<String , View> = HashMap()
        hashMap_Local["textView1"] = textView1
        hashMap_Local["textView2"] = textView2
        hashMap_Local["EditText1"] = EditText1
        hashMap_Local["CheckBox1"] = CheckBox1
        hashMap_Local["RadioButton1"] = RadioButton1

        val viweDesignOnline = ViewDesign_solusion(hashMap_Local)
        viweDesignOnline.IsHaveViwe()


    }



}//end class