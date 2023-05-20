<!DOCTYPE html>
<html>
<head>
    <title>New Company Created</title>
</head>
<body>
    <h1>New Company Created</h1>
    <p>A new company has been created:</p>
    
    <p>Name: {{ $company->name }}</p>
    <p>Email: {{ $company->email }}</p>
    <p>Website: {{ $company->website }}</p>
    
    <p>Thank you!</p>
</body>
</html>
