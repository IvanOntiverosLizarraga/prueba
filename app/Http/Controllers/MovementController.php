<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movement;
use App\Account;

class MovementController extends Controller
{
    public function index()
    {
        $movements = Movement::all();
        return view('user.movements.index')->with('movements',$movements);
    }

    public function select($id){
        $account = Account::find($id);
        return view('user.movements.create')->with('account',$account);
    }

    public function new(Request $request ,$id){
        $this->validate($request, [
            'description' => 'required|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ \t]*[0-9 \W]*$/i|min:5|max:50',
            'concept' => 'required',
            'amount' => 'required|numeric',
        ]);

        $movement = new Movement($request->all());
        $movement->account_id = $id;       
        $account = Account::find($id);

        if ($movement->amount <= $account->credit && $movement->concept == 'egreso') {
            $total = $account->credit - $movement->amount;
            $account->credit = $total;
            $account->save();
            $movement->save();
            flash("Se ha registrado el movimiento ".$movement->concept ." de forma exitosa.")->success();
            return redirect()->route('movements.show',$account->id);
        }else if($movement->concept == 'ingreso'){
            $total = $account->credit + $movement->amount;
            $account->credit = $total;
            $account->save();
            $movement->save();
            flash("Se ha registrado el movimiento ".$movement->concept ." de forma exitosa.")->success();
            return redirect()->route('movements.show',$account->id);
            
        }else{
            flash("No se puede realizar el movimiento ".$movement->concept ." ya que la cuenta no tiene fondos sufucientes.")->error();
            return redirect()->route('movements.show',$account->id);
        }
    }

    public function create()
    {
        return view('user.movements.create');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $account = Account::find($id);
        $movements = Account::find($id)->movements;
        return view('user.movements.index')->with('movements',$movements)->with('account',$account);
    }

    public function edit($id)
    {
        $movement = Movement::find($id);
        return view('user.movements.edit')->with('movement',$movement);
    }

    public function updte(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ \t]*[0-9 \W]*$/i|min:5|max:50',
            'concept' => 'required',
            'amount' => 'required|numeric',
        ]);

        //Obtengo el movimiento original   
        $movement = Movement::find($id);
        //Obtengo campos del movimiento actualizado
        $updateDescription =  $request->description;
        $updateConcept =  $request->concept;
        $updateAmount =  $request->amount;
        //Obtengo la cuenta
        $account = Account::find($movement->account_id);
        
        //Valido que el concepto no halla cambiado, asi como que sea egreso
        if ($movement->concept == $updateConcept && $movement->concept == 'egreso') 
        {
            //Revierto el credito de la cuenta
            $rev = $account->credit + $movement->amount;
            $account->credit = $rev;
            //Valido que el nuevo importe no sea mayor al credito 
            if ($updateAmount <= $account->credit) {
                //Registro el nuevo credito de la cuenta
                $total = $account->credit - $updateAmount;
                $movement->amount = $updateAmount;
                $movement->concept = $updateConcept;
                $account->save();
                //Actualizo el movimiento
                $movement->save();
                flash("Se ha editado el movimiento ".$movement->concept ." de forma exitosa.")->success();
                return redirect()->route('movements.show',$account->id);
            }else{
                flash("No se puede realizar el movimiento ".$movement->concept ." ya que la cuenta no tiene fondos sufucientes.")->error();
                return redirect()->route('movements.show',$account->id);
            }

        }else if($movement->concept == 'ingreso')
        {
            //Revierto el credito de la cuenta
            $rev = $account->credit - $movement->amount;
            $account->credit = $rev;            
            //Valido que el nuevo importe no sea mayor al credito 
            if ($updateAmount <= $account->credit) {
                //Registro el nuevo credito de la cuenta
                $total = $account->credit - $updateAmount;
                $account->credit = $total;
                $account->save();
                //Actualizo el movimiento
                $movement->amount = $updateAmount;
                $movement->concept = $updateConcept;
                $movement->save();
                flash("Se ha editado el movimiento ".$movement->concept ." de forma exitosa.")->success();
                return redirect()->route('movements.show',$account->id);
            }else{
                flash("No se puede realizar el movimiento ".$movement->concept ." ya que la cuenta no tiene fondos sufucientes.")->error();
                return redirect()->route('movements.show',$account->id);
            }
        }
        else 
        {   
            //Revierto el credito de la cuenta
            $rev = $account->credit + $movement->amount + $updateAmount;
            $account->credit = $rev;
            //Registro el nuevo credito
            $account->save();
            //Le paso los datos actualizados al movimiento
            $movement->concept = $updateConcept;
            $movement->amount = $updateAmount;
            //Actualizo el movimiento
            $movement->save();
            flash("Se ha editado el movimiento ".$movement->concept ." de forma exitosa.")->success();
            return redirect()->route('movements.show',$account->id);
        }
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $movement = Movement::find($id);
        $account = Account::find($movement->account_id);  
        

        if ($movement->concept == 'ingreso') {
            $total = $account->credit - $movement->amount;
            $account->credit = $total;
            $account->save();
            $movement->delete();
            flash("Se ha eliminado el movimiento ".$movement->concept ." de forma exitosa.")->error();
            return redirect()->route('movements.show',$account->id);
        }
        else
        {
            $total = $account->credit + $movement->amount;
            $account->credit = $total;
            $account->save();
            $movement->delete();
            flash("Se ha eliminado el movimiento ".$movement->concept ." de forma exitosa.")->error();
            return redirect()->route('movements.show',$account->id);
        }
    }

}
