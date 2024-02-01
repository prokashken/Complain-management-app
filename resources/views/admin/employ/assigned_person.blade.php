@php
 use App\Models\User;

$personName = null;
if (($row->assigned_person != null) && (User::where('id', $row->assigned_person)->exists())) {
    $person = User::find($row->assigned_person);
    $personName = $person->name;
}
@endphp
{{$personName == null ? '': $personName}}