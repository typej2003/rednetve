<?php

namespace App\Http\Livewire\Notificacion;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Mail\TestMail;
use App\Models\Notificacion;
use Mail;
use App\Models\User;
use App\Models\Cita;

class EmailController extends Component
{
    public $index;

    public function mount($index = 0)
    {
        $this->index = $index;
    }

    public function render()
    {
        switch ($variable) {
            case '1':
                # code...
                break;
            
            default:
                return view('livewire.notificacion.email-controller');
                break;
        }        
    }

    public function sendEmailManager($operacion, $dataManager)
    {

        $config = [
            'admin'   => ['email' => 'admin@panexpres.com', 'name' => 'Administración Pan Express'],
            'soporte' => ['email' => 'soporte@panexpres.com', 'name' => 'Soporte Pan Express'],
            'ventas'  => ['email' => 'ventas@panexpres.com', 'name' => 'Ventas Pan Express'],
        ];

        $remitente = $config[$dataManager['from_type']];


        $data = [
            "full_name" => $dataManager['full_name'],
            "email" => $dataManager['email'],
            "title" => $dataManager['subject'],
            "body"  => $dataManager['message'],
        ];
        
         Mail::send('emails.email-manager', $data, function($message) use ($data, $remitente) {
            $message->to($data["email"])
                    ->from($remitente['email'], $remitente['name']) // <--- Aquí cambias el remitente
                    ->subject($data["title"]);    
        });

    }

    public function sendMailAgenda(User $user, Cita $cita)
    {
        $cadena = "Nueva Cita:\n" .
          "Cliente: {$cita->nombre_completo}\n" .
          "Teléfono: {$cita->telefono}\n" .
          "Email: {$cita->email}\n" .
          "Servicio: {$cita->servicio}\n" .
          "Fecha: {$cita->fecha} a las {$cita->hora}\n" .
          "Dirección: {$cita->direccion_servicio}\n" .
          "Estado: " . ($cita->atendida ? 'Atendida' : 'Pendiente');

        $data = [
            "email" => $user->email,
            "title" => 'Administrador - RedNetVe',
            "body"  => $cadena
        ];
        
        Mail::send('emails.agenda-msj', $data, function($message) use ($data) {
            $message->to($data["email"])
                    ->from('admin@rednetve.com', 'Administrador RednetVe') // <--- Aquí cambias el remitente
                    ->subject($data["title"]);    
        });
    }

    public function sendMailAgendaCliente(Cita $cita)
    {
        $cadena = "Gracias por agendar con nosotros:\n" .
          "Cliente: {$cita->nombre_completo}\n" .
          "Teléfono: {$cita->telefono}\n" .
          "Email: {$cita->email}\n" .
          "Servicio: {$cita->servicio}\n" .
          "Dirección: {$cita->direccion_servicio}\n" .
          "Reunión \n" .
          "Fecha: {$cita->fecha} a las {$cita->hora}\n";
        $data = [
            "email" => 'ventas@rednetve.com',
            "title" => 'Reunión RednetVe',
            "body"  => $cadena
        ];
        
        Mail::send('emails.agenda-msj', $data, function($message) use ($data) {
            $message->to($cita->email)
                    ->from('ventas@rednetve.com', 'Administrador RednetVe') // <--- Aquí cambias el remitente
                    ->subject($data["title"]);    
        });
    }

    
}
