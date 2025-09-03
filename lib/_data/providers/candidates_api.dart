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

      if (response.statusCode == 200) {
        return HashMap.from(response.data as Map<String, dynamic>);
      } else {
        return HashMap.from({
          'error': response.data?['error'] ?? 'Something went wrong !',
        });
      }
    } catch (e) {
      return HashMap.from({'error': e.toString()});
    }
  }
}
