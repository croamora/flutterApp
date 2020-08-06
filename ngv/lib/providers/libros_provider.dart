import 'dart:convert';
import 'package:http/http.dart' as http;

class _LibrosProvider{

  List<dynamic> opciones = [];

  final String url = "http://localhost/test/public/api/libros";

  _LibrosProvider(){
    // cargarData();
  }

  Future<List<dynamic>> cargarData() async{
    final response = await http.post(
      Uri.encodeFull(url),
      headers: {"Accept" : "application/json"}
    );
    opciones = jsonDecode(response.body);

    return opciones;
  }
}

final librosProvider = new _LibrosProvider();