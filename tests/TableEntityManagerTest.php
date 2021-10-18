<?php declare(strict_types=1);

class TableEntityManagerTest extends \PHPUnit\Framework\TestCase
{
    private $testTable = [
        [
            "position" => 1,
            "team" => [
                "id" => 61,
                "name" => ",Chelsea FC",
                "crestUrl" => "https://crests.football-data.org/61.svg",
            ],
            "playedGames" => 7,
            "form" => null,
            "won" => 5,
            "draw" => 1,
            "lost" => 1,
            "points" => 16,
            "goalsFor" => 15,
            "goalsAgainst" => 3,
            "goalDifference" => 12,
        ]
    ];

    public function testSaveArray()
    {
        $entityManager = new class implements \App\Model\EntityManager\TableEntityManagerInterface {

            public function save(\App\Model\DataTransferObjects\TableDataTransferObject $tableDataTransferObject): void
            {
                file_put_contents(__DIR__ . '/table.json', json_encode($tableDataTransferObject, JSON_PRETTY_PRINT));
            }

            public function saveArray(array $table): void
            {
                file_put_contents(__DIR__ . '/table.json', json_encode($table, JSON_PRETTY_PRINT));
            }
        };

        $entityManager->saveArray($this->testTable);

        $tableData = json_decode(file_get_contents(__DIR__ . '/table.json'), true);

        $this->assertTrue(file_exists(__DIR__ . '/table.json'));
        $this->assertSame($this->testTable[0]['position'], $tableData[0]['position']);
    }

}
