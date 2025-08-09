import 'dart:io';

import 'package:path_provider/path_provider.dart';

class HistoryManager {
  static const fileName = "/histories";

  static Future<List<String>> getHistories() async {
    final List<String> histories = [];

    try {
      final Directory appDocumentsDir =
          await getApplicationDocumentsDirectory();
      final File dataFile = File(
        '${appDocumentsDir.path}${Platform.pathSeparator}$fileName',
      );

      if (await dataFile.exists()) {
        final String fileContent = await dataFile.readAsString();
        final List<String> contents =
            fileContent
                .split(Platform.lineTerminator)
                .where((c) => c.isNotEmpty)
                .toList();

        histories.addAll(contents);
      }

      return histories;
    } catch (_) {
      return histories;
    }
  }

  static Future<bool> addHistory({required String name}) async {
    try {
      final Directory appDocumentsDir =
          await getApplicationDocumentsDirectory();
      final File dataFile = File(
        '${appDocumentsDir.path}${Platform.pathSeparator}$fileName',
      );

      if (!(await dataFile.exists())) {
        await dataFile.create();
      }

      await dataFile.writeAsString(
        '$name${Platform.lineTerminator}',
        mode: FileMode.append,
      );

      return true;
    } catch (_) {
      return false;
    }
  }
}
