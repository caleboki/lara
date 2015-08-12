<html>
    <body>
       
    
    <?php $names = array(); ?>
        @forelse($names as $name)
            {{$name}}
        @empty
            There are no names
        @endforelse    
    </body>
</html>