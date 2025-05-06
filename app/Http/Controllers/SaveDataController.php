<?php
<<<<<<< HEAD
<?php
=======
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class SaveDataController extends Controller
{
    public function store(Request $request)
    {
        // 🛡 Form Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'description' => 'required|string'
        ]);

        // 💾 Data Save Karna
        $property = new Property();
        $property->name = $request->name;
        $property->address = $request->address;
        $property->city = $request->city;
        $property->state = $request->state;
        $property->zip = $request->zip;
        $property->country = $request->country;
        $property->email = $request->email;
        $property->phone = $request->phone;
        $property->description = $request->description;
        $property->save();

        // 🔄 Redirect with Success Message
        return redirect()->back()->with('success', 'Property Registered Successfully!');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
