import 'dart:collection';

import 'package:ppdb_smk_tin/_data/_utils/api_utils.dart';

class ScoresApi {
  static Future<HashMap<String, dynamic>> getAllScores() async {
    try {
      final response = await ApiUtils.getClient().get('/api/scores');
      return HashMap.from({'scores': response.data as List<dynamic>});
    } catch (e) {
      return HashMap.from({'error': e.toString()});
    }
  }
}
