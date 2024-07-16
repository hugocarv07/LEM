<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index() {
        $search = request('search');

        if ($search) {
            $events = Event::where('title', 'like', '%'.$search.'%')->paginate(8); // Pagina com 1 itens por página
        } else {
            $events = Event::paginate(8); // Pagina com 1 itens por página
        }        

        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Event;

        $event->name = $request->name;
        $event->title = $request->title;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->Pdf = $request->Pdf;
        $event->Orientador = $request->Orientador;
        $event->ppg = $request->ppg;

        //upload de imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName(). strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/produtos'), $imageName);

            $event->image = $imageName;
        } else {
            // Definir um valor padrão
            $event->image = 'produtos\7378c868b9c970a277b976d50d51317e.jpg'; // Certifique-se de ter uma imagem padrão chamada 'default.png' na pasta 'public/img/produtos'
        }
        
// Upload de PDF
if ($request->hasFile('Pdf') && $request->file('Pdf')->isValid()) {
    $requestPdf = $request->Pdf;
    $pdfExtension = $requestPdf->extension();
    $pdfName = md5($requestPdf->getClientOriginalName(). strtotime("now")) . "." . $pdfExtension;

    $requestPdf->move(public_path('pdfs'), $pdfName);

    $event->Pdf = $pdfName;
}else {
    // Definir um valor padrão
    $event->Pdf = 'pdfs\images.pdf'; // Certifique-se de ter um PDF padrão chamado 'default.pdf' na pasta 'public/pdfs'
}

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Produto criado com sucesso!');
    }

    public function show($id) {
        $event = Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard() {
        $user = auth()->user();
        $events = $user->events;

        return view('events.dashboard', ['events'=> $events]);
    }

    public function destroy($id) {
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Produto excluído com sucesso!');
    }

    public function edit($id) {
        $user = auth()->user();
        $event = Event::findOrFail($id);

        if ($user->id != $event->user_id) {
            return redirect('/dashboard');
        }

        return view('events.edit', ['event' => $event]);
    }
    
    public function showEvaluationForm() {
        return view('ficha'); // Certifique-se que este nome corresponde ao nome do arquivo da view
    }
    
    
    
    public function storeEvaluation(Request $request){
        // Aqui você pode validar os dados recebidos
        $request->validate([
            'evaluator_name' => 'required|max:255',
            'evaluation_date' => 'required|date',
            'comments' => 'nullable'
        ]);
    
        // Processamento dos dados
        // Aqui você poderia criar uma nova instância de um modelo de Avaliação, por exemplo
        $evaluation = new Event;
        $evaluation->evaluator_name = $request->evaluator_name;
        $evaluation->evaluation_date = $request->evaluation_date;
        $evaluation->comments = $request->comments;
        $evaluation->save();
    
        // Retorno após o processamento
        return redirect('/some-route')->with('success', 'Avaliação registrada com sucesso!');
    }

    public function update(Request $request) {
        $data = $request->all();

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }

        // PDF Upload
    if ($request->hasFile('Pdf') && $request->file('Pdf')->isValid()) {
        $requestPdf = $request->Pdf;
        $pdfExtension = $requestPdf->extension();
        $pdfName = md5($requestPdf->getClientOriginalName(). strtotime("now")) . "." . $pdfExtension;

        $requestPdf->move(public_path('pdfs'), $pdfName);

        $data['Pdf'] = $pdfName;
    }

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Produto editado com sucesso!');
    }
}