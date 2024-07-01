<?php

namespace XeroPHP\Remote;

/**
 *
 * <PageInfo>
 * <Page>1</Page>
 * <PageSize>1000</PageSize>
 * <TotalPages>2</TotalPages>
 * <TotalRows>1275</TotalRows>
 * </PageInfo>
 */
class PageInfo
{
    private int $page;
    private int $pageSize;
    private int $totalPages;
    private int $totalRows;

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage($value): self
    {
        $this->page = $value;

        return $this;
    }


    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function setPageSize($value): self
    {
        $this->pageSize = $value;

        return $this;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function setTotalPages($value): self
    {
        $this->totalPages = $value;

        return $this;
    }

    public function getTotalRows(): int
    {
        return $this->totalRows;
    }

    public function setTotalRows($value): self
    {
        $this->totalRows = $value;

        return $this;
    }
}
