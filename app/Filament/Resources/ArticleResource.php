<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TiptapEditor::make('content')->required()->columnSpanFull()->default("<pre><code>**Solution**

The correct answer is **Option B) ₹72 Lakhs.**

First, let&#039;s determine the total sales for each broker:
- **Broker A**: Each house sells for ₹24,00,000. Selling 50 houses, total sales are:
  $$
  24,00,000 \times 50 = ₹12\text{ crores}
  $$
- **Broker B**: Each house sells for ₹20,00,000. Selling 45 houses, total sales are:
  $$
  20,00,000 \times 45 = ₹9\text{ crores}
  $$

Next, we calculate their earnings based on their commission rates:
- **Broker A**: Receives a 3% commission. His earnings are:
  $$
  \frac{3}{100} \times 120000000 = ₹36,00,000
  $$
- **Broker B**: Receives a 4% commission. His earnings are:
  $$
  \frac{4}{100} \times 90000000 = ₹36,00,000
  $$

**Total earnings for both brokers combined**:
$$
₹36,00,000 + ₹36,00,000 = ₹72,00,000 \text{ or ₹72 Lakhs.}
$$
</code></pre></code></pre>")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CommentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
