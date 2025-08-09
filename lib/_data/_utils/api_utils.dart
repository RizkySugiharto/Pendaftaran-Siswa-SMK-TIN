import 'package:flutter_dotenv/flutter_dotenv.dart';
import 'package:dio/dio.dart';

class ApiUtils {
  static final Dio client = Dio(
    BaseOptions(
      baseUrl: hostname,
      connectTimeout: Duration(seconds: 10),
      receiveTimeout: Duration(seconds: 10),
      validateStatus: (_) => true,
      followRedirects: true,
    ),
  );
  static final String hostname = dotenv.get(
    'BACKEND_HOSTNAME',
    fallback: 'http://localhost:8000',
  );

  static Dio getClient() {
    return client;
  }
}
