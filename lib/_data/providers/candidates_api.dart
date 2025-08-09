import 'dart:collection';

import 'package:dio/dio.dart';
import 'package:ppdb_smk_tin/_data/_utils/api_utils.dart';

class CandidatesApi {
  static Future<HashMap<String, dynamic>> register({
    required Map<String, String> fields,
  }) async {
    try {
      final formData = FormData.fromMap(fields);
      final response = await ApiUtils.getClient().post(
        '/api/register',
        data: formData,
      );

      return HashMap.from(response.data as Map<String, dynamic>);
    } catch (e) {
      return HashMap.from({'error': e.toString()});
    }
  }
}
