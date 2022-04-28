<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCategoryHasManyProducts(): void
    {
        $category = new Category();

        $this->assertInstanceOf(Collection::class, $category->products);
    }
}
