/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.pbang.desktop_input_nilai_psb;

import java.net.CookieHandler;

/**
 *
 * @author rizky
 */
public class Desktop_Input_Nilai_PSB {

    public static void main(String[] args) {
        CookieHandler.setDefault(HttpUtils.cookieManager);
        LoginFrame.main(args);
    }
}
