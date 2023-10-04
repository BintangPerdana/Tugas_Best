import 'kalkulator.dart';
import 'dart:io';

void main() {
  String ulang = 'Y';
  while (ulang == 'Y' || ulang == 'y') {
    try {
      print("==========Kalkulator==========");
      stdout.write("Masukkan angka 1 : ");
      int angka1 = int.parse(stdin.readLineSync()!);

      stdout.write("Masukkan angka 2 : ");
      int angka2 = int.parse(stdin.readLineSync()!);

      print("Pilih operasi perhitungan (1 - 4) :");
      print("1. Tambah");
      print("2. Kurang");
      print("3. Kali");
      print("4. Bagi");
      int operator = int.parse(stdin.readLineSync()!);

      Kalkulator jalan = Kalkulator(angka1, angka2, operator);

      stdout.write("Hasilnya adalah ");
      jalan.hitungHasil();

      stdout.write("Apakah ingin mengulang (Y/T) : ");
      ulang = stdin.readLineSync()!;
    } catch (e) {
      print('Exception : $e');
    }
  }
  print("Terima kasih sudah menggunakan kalkulator ini :)");
}
