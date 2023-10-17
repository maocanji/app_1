import 'dart:convert';
import 'dart:html';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class Listar extends StatefulWidget{
  @override
  State<Listar> createState() => _ListarState();
}

class _ListarState extends State<Listar> {
  List data;


  Future<List> listarData() async{
    final response = await http.get('http://127.0.0.1:8000/api/TodosRegistros');
    return json.decode(response.body);
  }
  @override
  void inisState(){
    //
    super.initState();
    this.listarData();
  }

  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return scaffold(appBar: AppBar(
      title: const Text('lista de Registros'),
      actions: [],),
      body: FutureBuilder<List>(
          future: listarData(),
          builder: (context, snapshot){
            if(snapshot.hasError) print(snapshot.error);
            return snapshot.hasData
                ? ItemList (
                list: snapshot.data
                )
                :Center(
                child:  CircularProgressIndicator(),
                );
          },
      ),
      );
  }
}

  class ItemList extends StatelessWidget {
    final List list;
    const ItemList({super.key, required this.list});

    @override
    Widget build(BuildContext context)
    {

      }
  }