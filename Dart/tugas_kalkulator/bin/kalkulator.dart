class Kalkulator {
  int angka1;
  int angka2;
  int operator;

  Kalkulator(this.angka1, this.angka2, this.operator);

  void hitungHasil() {
    switch (operator) {
      case 1:
        print("${angka1 + angka2}");
        break;
      case 2:
        print("${angka1 - angka2}");
        break;
      case 3:
        print("${angka1 * angka2}");
        break;
      case 4:
        print("${angka1 / angka2}");
        break;
      default:
        print("Operasi tidak ada");
        break;
    }
  }
}
