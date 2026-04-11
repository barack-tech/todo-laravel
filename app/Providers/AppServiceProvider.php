use Illuminate\Pagination\Paginator;

public function boot(): void
{
    Paginator::useTailwind();
}