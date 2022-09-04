@foreach($data as $member)
    Member ID: {{ $member['id'] }}
    Firstname: {{ $member['firstName'] }}
    Lastname: {{ $member['lastName'] }}
    Phone: {{ $member['phoneNumber'] }}

    Owner ID: {{ $member['owner']['id'] }}
    Firstname: {{ $member['owner']['firstName'] }} 
    Lastname: {{ $member['owner']['lastName'] }}
@endforeach