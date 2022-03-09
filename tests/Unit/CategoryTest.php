<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function testCategoryHasManyProducts(): void
    {
        $category = new Category();

        $this->assertInstanceOf(Collection::class, $category->products);
    }
}
