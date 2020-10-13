package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.EditText;


public class MainActivity extends AppCompatActivity {
    EditText result;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        result = findViewById(R.id.text_result);

        findViewById(R.id.button_bs).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String s =  result.getText().toString();
                int n = s.length();
                result.setText("");
                if(s.equals("0")||n == 1) result.setText("0");
                else {
                    for(int i = 0; i < s.length()-1; ++i){
                        result.setText(result.getText().toString()+s.charAt(i));
                    }
                }
            }
        });
        findViewById(R.id.button_c).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                result.setText("0");
            }
        });
        findViewById(R.id.button_ce).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String s =  result.getText().toString();
                result.setText("");
                int n=0;
                for(int i = s.length()-1; i >=0; --i){
                    char c = s.charAt(i);
                    if(c == '+' || c == '-' || c == '*' || c == '/'){
                        n = i;
                        break;
                    }
                }
                if(n == 0) result.setText("0");
                else if(!s.equals("0")){
                    for(int i = 0; i <= n; ++i){
                        result.setText(result.getText().toString()+s.charAt(i));
                    }
                }
            }
        });
        findViewById(R.id.button_divide).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                result.setText(result.getText().toString() + '/');
        }
        });
        findViewById(R.id.button_zero).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(!result.getText().toString().equals("0"))
                    result.setText(result.getText().toString() + '0');
            }
        });
        findViewById(R.id.button_one).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(result.getText().toString().equals("0"))
                    result.setText("1");
                else
                    result.setText(result.getText().toString() + '1');
            }
        });
        findViewById(R.id.button_two).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(result.getText().toString().equals("0"))
                    result.setText("2");
                else
                    result.setText(result.getText().toString() + '2');
            }
        });
        findViewById(R.id.button_three).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(result.getText().toString().equals("0"))
                    result.setText("3");
                else
                    result.setText(result.getText().toString() + '3');
            }
        });
        findViewById(R.id.button_four).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(result.getText().toString().equals("0"))
                result.setText("4");
                else
                result.setText(result.getText().toString() + '4');
            }
        });
        findViewById(R.id.button_five).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(result.getText().toString().equals("0"))
                    result.setText("5");
                else
                    result.setText(result.getText().toString() + '5');
            }
        });
        findViewById(R.id.button_six).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(result.getText().toString().equals("0"))
                    result.setText("6");
                else
                    result.setText(result.getText().toString() + '6');
            }
        });
        findViewById(R.id.button_seven).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(result.getText().toString().equals("0"))
                    result.setText("7");
                else
                    result.setText(result.getText().toString() + '7');
            }
        });
        findViewById(R.id.button_eight).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(result.getText().toString().equals("0"))
                    result.setText("8");
                else
                    result.setText(result.getText().toString() + '8');
            }
        });
        findViewById(R.id.button_nine).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(result.getText().toString().equals("0"))
                    result.setText("9");
                else
                    result.setText(result.getText().toString() + '9');
            }
        });
        findViewById(R.id.button_dot).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                result.setText(result.getText().toString() + '.');
            }
        });
        findViewById(R.id.button_change).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                boolean check = true;
                String s =  result.toString();
                for(int i = 0; i < s.length(); ++i){
                    char c = s.charAt(i);
                    if(c == '+' || c == '-' || c == '*' || c == '/'){
                        check = false;
                        break;
                    }
                }
                if(check){
                    int n = Integer.parseInt(result.toString());
                    n = -n;
                    result.setText(n);
                }
            }
        });
        findViewById(R.id.button_multi).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                result.setText(result.getText().toString() + '*');
            }
        });
        findViewById(R.id.button_subtract).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                result.setText(result.getText().toString() + '-');
            }
        });
        findViewById(R.id.button_plus).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                result.setText(result.getText().toString() + '+');
            }
        });
        findViewById(R.id.button_rs).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // chua kip lam balan hjhj
            }
        });
    }
}