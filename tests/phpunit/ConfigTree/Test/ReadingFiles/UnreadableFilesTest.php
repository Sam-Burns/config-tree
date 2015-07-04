<?php
namespace ConfigTree\Test\ReadingFiles;

use ConfigTree\FileParsing\Reading\FileContentsRetriever;
use PHPUnit_Framework_TestCase as TestCase;

class UnreadableFilesTest extends TestCase
{
    /** @var string */
    private $unreadableFile;

    public function setUp()
    {
        $this->unreadableFile = TEST_DIR . '/fixtures/unreadable_files/unreadable_config.json';
        chmod($this->unreadableFile, 0000);
    }

    public function tearDown()
    {
        chmod($this->unreadableFile, 0644);
    }

    /**
     * @expectedException \ConfigTree\Exception\FileNotReadable
     */
    public function testGetExceptionForUnreadableFiles()
    {
        $fileContentsRetriever = new FileContentsRetriever();
        $fileContentsRetriever->fileGetContents($this->unreadableFile);
    }
}
