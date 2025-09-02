/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.pbang.desktop_input_nilai_psb;

import java.net.CookieManager;
import java.net.CookiePolicy;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.net.URI;
import java.util.concurrent.CompletableFuture;
import org.json.JSONObject;
import org.json.JSONArray;

/**
 *
 * @author rizky
 */
public class HttpUtils {
    final static public CookieManager cookieManager = new CookieManager(new MyCookieStore(), CookiePolicy.ACCEPT_ALL);
    static public HttpClient httpClient = HttpClient.newBuilder()
            .cookieHandler(cookieManager)
            .build();
    final static public String baseUrl = "http://localhost:8000/api";
    
    static public CompletableFuture<HttpResponse<String>> getSingleCandidate(String nik) {
        HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(baseUrl + "/candidates/" + nik))
                .GET()
                .build();
        CompletableFuture<HttpResponse<String>> futureResponse = httpClient.sendAsync(
                request,
                HttpResponse.BodyHandlers.ofString()
        );
        
        return futureResponse;
    }
    
    static public CompletableFuture<HttpResponse<String>> getCandidateGrades(String nik) {
        HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(baseUrl + "/grades/" + nik))
                .GET()
                .build();
        CompletableFuture<HttpResponse<String>> futureResponse = httpClient.sendAsync(
                request,
                HttpResponse.BodyHandlers.ofString()
        );
        
        return futureResponse;
    }
    
    static public CompletableFuture<HttpResponse<String>> updateOrStoreCandidateGrades(String nik, JSONArray grades) {
        HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(baseUrl + "/grades/" + nik))
                .PUT(HttpRequest.BodyPublishers.ofString(grades.toString()))
                .setHeader("Content-Type", "application/json")
                .build();
        CompletableFuture<HttpResponse<String>> futureResponse = httpClient.sendAsync(
                request,
                HttpResponse.BodyHandlers.ofString()
        );
        
        return futureResponse;
    }
    
    static public CompletableFuture<HttpResponse<String>> loginAdmin(String email, String password) {
        final JSONObject formData = new JSONObject();
        formData.put("email", email);
        formData.put("password", password);
        
        HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(baseUrl + "/admin/login"))
                .POST(HttpRequest.BodyPublishers.ofString(formData.toString()))
                .setHeader("Content-Type", "application/json")
                .build();
        CompletableFuture<HttpResponse<String>> futureResponse = httpClient.sendAsync(
                request,
                HttpResponse.BodyHandlers.ofString()
        );
        
        return futureResponse;
    }
    
    static public CompletableFuture<HttpResponse<String>> logoutAdmin() {
        HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(baseUrl + "/admin/logout"))
                .POST(HttpRequest.BodyPublishers.ofString(""))
                .build();
        CompletableFuture<HttpResponse<String>> futureResponse = httpClient.sendAsync(
                request,
                HttpResponse.BodyHandlers.ofString()
        );
        
        return futureResponse;
    }
}
