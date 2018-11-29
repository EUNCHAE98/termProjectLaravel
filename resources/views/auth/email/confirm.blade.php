
{{$user->name}}님 환영합니다.
가입 승인 절차을 위해 아래 링크를 열어 주세요.
{{route('register.confirm', $user->confirm_code)}}
